<?php

namespace App\Http\Controllers;

use App\Dtos\DepositDto;
use App\Dtos\UserDto;
use App\Dtos\WithdrawDto;
use App\Exceptions\AccountNumberExistsException;
use App\Exceptions\ANotFoundException;
use App\Exceptions\DepositAmountToLowException;
use App\Exceptions\InvalidAccountNumberException;
use App\Exceptions\InvalidPinException;
use App\Http\Requests\Account\DepositRequest;
use App\Http\Requests\Account\TransferRequest;
use App\Http\Requests\Account\WithdrawRequest;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct(private readonly AccountService $accountService)
    {
    }

    /**
     * @throws AccountNumberExistsException
     */
    public function store(Request $request)
    {
        $userDto = UserDto::fromModel($request->user());
        $account = $this->accountService->createAccountNumber($userDto);
        return $this->sendSuccess(['acccount' => $account], 'Account number generated successfully');
    }

    /**
     * @throws InvalidAccountNumberException
     * @throws DepositAmountToLowException
     */
    public function deposit(DepositRequest $request)
    {
        $depositDto = new DepositDto();
        $depositDto->setAccountNumber($request->input('accountNumber'));
        $depositDto->setAmount($request->input('amount'));
        $depositDto->setDescription($request->input('description'));
        $this->accountService->deposit($depositDto);
        return $this->sendSuccess([], 'Deposit successful');
    }

    /**
     * @throws InvalidAccountNumberException
     * @throws ANotFoundException
     */
    public function withdraw(WithdrawRequest  $request)
    {
        $account = $this->accountService->getAccountByUserID($request->user()->id);
        $withdrawDto = new WithdrawDto();
        $withdrawDto->setAccountNumber($account->account_number);
        $withdrawDto->setAmount($request->input('amount'));
        $withdrawDto->setDescription($request->input('description'));
        $withdrawDto->setPin($request->input('pin'));
        $this->accountService->withdraw($withdrawDto);
        return $this->sendSuccess([], 'Withdrawal successful');
    }

    /**
     * @throws InvalidPinException
     * @throws ANotFoundException
     */
    public function transfer(TransferRequest $request)
    {
        $user = $request->user();
        $senderAccount = $this->accountService->getAccountByUserID($user->id);

        $transferDto = $this->accountService->transfer(
            $senderAccount->account_number,
            $request->input('receiver_account_number'),
            $request->input('pin'),
            $request->input('amount'),
            $request->input('description'),
        );

        return $this->sendSuccess([], 'Account Transfer In Progress');
    }
}

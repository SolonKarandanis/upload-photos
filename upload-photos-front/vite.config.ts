import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import tailwindcss from '@tailwindcss/vite'
import autoprefixer from 'autoprefixer'
import path from 'node:path'

// https://vite.dev/config/
export default defineConfig({
    css:{
        postcss: {
            plugins: [autoprefixer()],
        },
    },
    plugins: [
      vue(),
      tailwindcss(),
    ],
    server: {
        host: 'localhost'
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './src'),
        },
    },
})

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

const repoName = 'npb-directory-Laravel'

// https://vite.dev/config/
export default defineConfig({
  base: `/${repoName}/`,
  build: {
    outDir: 'dist',
  },
  plugins: [vue()],
})

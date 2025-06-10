import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';

const repoName = 'npb-directory-Laravel'

// https://vite.dev/config/
export default defineConfig({
  base: `/${repoName}/`,
  build: {
    outDir: 'dist',
  },
  plugins: [vue()],
  resolve: {
  alias: {
    '@':path.resolve(__dirname, 'src/js'),
    },
  },
})

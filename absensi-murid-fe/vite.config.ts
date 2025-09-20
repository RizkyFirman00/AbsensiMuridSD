import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";

// https://vite.dev/config/
export default defineConfig({
  plugins: [react()],
  server: {
    port: 5173,
    proxy: {
      "/sanctum": "http://localhost:8000",
      "/login": "http://localhost:8000",
      "/logout": "http://localhost:8000",
      "/api": "http://localhost:8000",
    },
  },
});

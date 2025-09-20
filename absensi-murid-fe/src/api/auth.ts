import api from "./axios";

export async function login(email: string, password: string) {
  await api.get("/sanctum/csrf-cookie");
  const res = await api.post("/login", { email, password });
  return res.data;
}

export async function register(name: string, email: string, password: string) {
  await api.get("/sanctum/csrf-cookie");
  const res = await api.post("/api/register", { name, email, password });
  return res.data;
}

export async function logout() {
  await api.post("/logout");
}

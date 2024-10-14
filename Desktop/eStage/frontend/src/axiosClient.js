import axios from "axios";

const axiosClient = axios.create({
    baseURL: import.meta.env.VITE_BACKEND_URL,
    withCredentials: true,
    withXSRFToken: true,
    
});

// axiosClient.interceptors.request.use((config) => {
//     // List of routes that don't require an authorization token
//     const noAuthRoutes = ["/login", "/register"];

//     // Check if the request URL is not part of the noAuthRoutes
//     if (!noAuthRoutes.includes(config.url)) {
//         const token = window.localStorage.getItem(`ACCESS_TOKEN`);
//         if (token) {
//             config.headers.Authorization = `Bearer ${token}`;
//         }
//     }

//     return config;
// });

// axiosClient.interceptors.response.use(
//     (response) => {
//         return response;
//     },
//     (error) => {
//         const { response } = error;
//         if (response.status === 401) {
//             window.localStorage.removeItem("ACCESS_TOKEN");
//         }

//         throw error;
//     }
// );

export default axiosClient;

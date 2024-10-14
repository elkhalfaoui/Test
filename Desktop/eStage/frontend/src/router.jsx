import { createBrowserRouter, Navigate, Outlet } from "react-router-dom";
import Login from "./views/login/Login";
import Signup from "./views/Signup";
import Users from "./views/Users";
import NotFound from "./views/NotFound";

const router = createBrowserRouter([
    {
        path: "/",
        element: <Navigate to={"/login"} />,
    },
    {
        path: "/login",
        element: <Login />,
    },
    {
        path: "/signup",
        element: <Signup />,
    },

    {
        path: "/users",
        element: <Users />,
    },
    {
        path: "*",
        element: <NotFound />,
    },
]);

export default router;

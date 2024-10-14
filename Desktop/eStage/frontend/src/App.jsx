import { RouterProvider } from "react-router-dom";
import router from "./router";
import { connect } from "react-redux";
import { useEffect } from "react";

const App = ({ token, setToken }) => {
    useEffect(() => {
        if(window.localStorage.getItem('ACCESS_TOKEN') == "null") {
          setToken(null);
        }
        else {
          setToken(window.localStorage.getItem("ACCESS_TOKEN"));
        }
    }, []);
    return (
        <>
            <RouterProvider router={router} />
        </>
    );
};

const mapStateToProps = (state) => ({ token: state.token });

const mapDispatchToProps = (dispatch) => ({
    setToken: (token) => dispatch({ type: "SET_TOKEN", token }),
});

export default connect(mapStateToProps, mapDispatchToProps)(App);

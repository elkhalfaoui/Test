import { useEffect } from "react";
import { connect } from "react-redux";
import { useNavigate } from "react-router-dom";
import axiosClient from "../axiosClient";
import "./users.css";

const Users = ({ token, setToken, user, setUser }) => {
    // const navigate = useNavigate();
    // useEffect(() => {
    //     // ! i am trying to wait untill the token load if the user refrech if the token exist
    //     // ! dont navigate to login [stats still does not work it navigate even the token loaded]
    //     // setTimeout(() => {
    //     if (!token) {
    //         // document.body.append(`SetTimeOut`);
    //         navigate("/login");
    //     }

    //     //     }, 10000);
    // }, [token]);

    const logout = async () => {
        await axiosClient.post("/logout").then(({ response }) => {
            window.localStorage.setItem("ACCESS_TOKEN", "null");
            setUser(null);
            setToken(null);
        });
    };

    useEffect(() => {
        const fetchUser = async () => {
            await axiosClient.get("sanctum/csrf-cookie");
            await axiosClient
                .get("/api/user")
                .then(({ data }) => {
                    setUser({ ...data });
                })
                .catch((err) => {
                    const response = { err };
                    console.log(response);
                });
        };
        fetchUser();
    }, []);

    return (
        token && (
            <div className="page">
                <nav>
                    <div className="logo">
                        <h2>CHU</h2>
                    </div>
                    <div className="nav-section">
                        <h4>Comptes</h4>
                        <ul>
                            <li>
                                <a href="#">list des comptes</a>
                            </li>
                            <li>
                                <a href="#">creation du compte</a>
                            </li>
                            <li>
                                <a href="#">demande du compte</a>
                            </li>
                        </ul>
                    </div>
                    <div className="nav-section">
                        <h4>Capacite</h4>
                        <ul>
                            <li>
                                <a href="#">list des comptes</a>
                            </li>
                            <li>
                                <a href="#">creation du compte</a>
                            </li>
                            <li>
                                <a href="#">demande du compte</a>
                            </li>
                        </ul>
                    </div>
                    <div className="nav-section">
                        <h4>Stagiaire</h4>
                        <ul>
                            <li>
                                <a href="#">list des comptes</a>
                            </li>
                            <li>
                                <a href="#">creation du compte</a>
                            </li>
                            <li>
                                <a href="#">demande du compte</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div className="nav-section">
                        <h4>Ecole</h4>
                        <ul>
                            <li>
                                <a href="#"><span>&copy;</span> list des comptes</a>
                            </li>
                            <li>
                                <a href="#">creation du compte</a>
                            </li>
                            <li>
                                <a href="#">demande du compte</a>
                            </li>
                        </ul>
                    </div>
                    
                    <button onClick={logout}>logout</button>
                </nav>
                <main>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                    <h1>Main</h1>
                </main>
            </div>
        )
    );
};

const mapStatetoProps = (state) => ({
    token: state.token,
    user: state.user,
});

const mapDispatchToProps = (dispatch) => ({
    setToken: (token) => dispatch({ type: "SET_TOKEN", token }),
    setUser: (user) => dispatch({ type: "SET_USER", user }),
});

export default connect(mapStatetoProps, mapDispatchToProps)(Users);

import { useEffect, useRef, useState } from "react";
import { connect } from "react-redux";
import { Link, useNavigate } from "react-router-dom";
import axiosClient from "../../axiosClient";

const LoginForm = ({ setUser, setToken, token }) => {
    const [errors, setErrors] = useState();
    const emailRef = useRef();
    const passwordRef = useRef();

    // if user connected direct to /users
    const navigate = useNavigate();
    useEffect(() => {
        if (token) {
            navigate("/users");
        }
    }, [token]);

    const handleSubmit = (event) => {
        event.preventDefault();
        const payload = {
            email: emailRef.current.value,
            password: passwordRef.current.value,
        };
        const login = async () => {
            await axiosClient.get("sanctum/csrf-cookie");
            await axiosClient
                .post("/login", payload)
                .then(({ data }) => {
                    setUser(data.user);
                    window.localStorage.setItem("ACCESS_TOKEN", data?.token);
                    setToken(data.token);
                })
                .catch(({ response }) => {
                    // console.log(response);

                    setErrors({
                        email: response.data.errors.email[0],
                        password: response.data.errors.password[0],
                    });

                    // const response = { err };
                    // if (response && response.status === 422) {
                    //     console.log(response.data.errors);
                    // }
                });
        };
        login();
    };

    return (
        <>
            <div className="left"></div>
            <div className="right">
                <h2>se connecter</h2>
                <form onSubmit={handleSubmit}>
                    <div className="form-input">
                        <input
                            type="email"
                            name="email"
                            ref={emailRef}
                            placeholder="Email"
                        />
                        <p style={{ color: "red" }}>
                            {errors?.email && `* ${errors?.email}`}
                        </p>
                    </div>
                    <div className="form-input">
                        <input
                            type="password"
                            name="password"
                            ref={passwordRef}
                            placeholder="Mot de pass"
                        />
                        <p style={{ color: "red" }}>
                            {errors?.password && `* ${errors?.password}`}
                        </p>
                    </div>
                    <input type="submit" value="Connecter" />
                    <p>vous n'avez pas l'accès ?</p>
                    {/* <Link to="/signup">demande de compte</Link> */}
                </form>
                <button
                    className="demande-compte-button"
                    onClick={(event) => {
                        event.preventDefault();
                        let width = 0;

                        let inter = setInterval(() => {
                            if (width > -720) {
                                width -= 20;
                                document.querySelector(
                                    ".login-page .login"
                                ).style.left = `${width}px`;
                            }
                        }, 0.01);
                        if (width === -720) {
                            clearInterval(inter);
                        }
                    }}
                >
                    demande de compte -&gt;
                </button>
            </div>
        </>
    );
};

const mapStateToProps = (state) => ({ token: state.token });

const mapDispatchToProps = (dispatch) => ({
    setToken: (token) => dispatch({ type: "SET_TOKEN", token }),
    setUser: (user) => dispatch({ type: "SET_USER", user }),
});

export default connect( mapStateToProps, mapDispatchToProps)(LoginForm);

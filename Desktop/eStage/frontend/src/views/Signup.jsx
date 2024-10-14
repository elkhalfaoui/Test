import { useEffect, useRef } from "react";
import axiosClient from "../axiosClient";
import { connect } from "react-redux";
import { Link, useNavigate } from "react-router-dom";

const Signup = ({ setToken, setUser, token }) => {
    
    const navigate = useNavigate();
    useEffect(() => {
        if (token) {
            navigate("/users");
        }
    }, [token]);
    const nameref = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();
    const handleSubmit = (e) => {
        e.preventDefault();
        const payload = {
            name: nameref.current.value,
            email: emailRef.current.value,
            password: passwordRef.current.value,
        };
        const signup = async () => {
            
            await axiosClient
                .post("/register", payload)
                .then(({ data }) => {
                    setUser({...data.user});
                    window.localStorage.setItem("ACCESS_TOKEN", data.token);
                    setToken(data.token);
                })
                .catch((err) => {
                    const response = { err };
                    if (response && response.status === 422) {
                        console.log(response.data.errors);
                    }
                });
        };
        signup();
    };
    return (
        !token && (
            <div>
                <h1>token : {token}</h1>
                <form onSubmit={handleSubmit}>
                    <h2>Create an account</h2>

                    <input
                        type="text"
                        name="name"
                        ref={nameref}
                        placeholder="Name..."
                    />
                    <input
                        type="email"
                        name="email"
                        ref={emailRef}
                        placeholder="Email..."
                    />
                    <input
                        type="password"
                        name="password"
                        ref={passwordRef}
                        placeholder="Password..."
                    />
                    <input type="submit" value="Sign-up" />
                    <p>
                        Already registred? <Link to="/login">Sign in</Link>
                    </p>
                </form>
            </div>
        )
    );
};

const mapStateToProps = (state) => ({ token: state.token });

const mapDispatchToProps = (dispatch) => ({
    setToken: (token) => dispatch({ type: "SET_TOKEN", token }),
    setUser: (user) => dispatch({ type: "SET_USER", user }),
});

export default connect(mapStateToProps, mapDispatchToProps)(Signup);

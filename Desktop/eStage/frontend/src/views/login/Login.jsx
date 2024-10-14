import "./login.css";
import LoginForm from "./LoginForm";
import DemandeForm from "./DemandeForm";
import { connect } from "react-redux";

const Login = () => {
    return (
        <div className="login-page">
            <div className="content">
                <div className="login">
                    <div className="login-form">
                        <LoginForm />
                    </div>
                    <div className="demande-form">
                        <DemandeForm />
                    </div>
                </div>
            </div>
        </div>
    );
};

// const mapStateToProps = (state) => ({ token: state.token });

export default Login;

import { useRef, useState } from "react";
import axiosClient from "../../axiosClient";

const DemandeForm = () => {
    const [errors, setErrors] = useState({});
    const [message, setMessage] = useState("");
    const nomRef = useRef();
    const prenomRef = useRef();
    const emailRef = useRef();
    const telephoneRef = useRef();
    const pprRef = useRef();
    const typeRef = useRef();
    const etablissementRef = useRef();
    const serviceRef = useRef();

    const handleDemande = (event) => {
        event.preventDefault();
        const payload = {
            nom: nomRef.current.value,
            prenom: prenomRef.current.value,
            email: emailRef.current.value,
            telephone: telephoneRef.current.value,
            ppr: pprRef.current.value,
            typeCompte: typeRef.current.value,
            etablissement: etablissementRef.current.value,
            service: serviceRef.current.value,
        };
        const demandeCompte = async () => {
            await axiosClient.get("sanctum/csrf-cookie");
            await axiosClient
                .post("/api/demandeCompte", payload)
                .then(({ data }) => {
                    setMessage({ ...data });
                })
                .catch(({ response }) => {
                    console.log(response);
                    setErrors({
                        nom: response?.data?.errors?.nom?.[0],
                        prenom: response?.data?.errors?.prenom?.[0],
                        email: response?.data?.errors?.email?.[0],
                        telephone: response?.data?.errors?.telephone?.[0],
                        ppr: response?.data?.errors?.ppr?.[0],
                        typeCompte: response?.data?.errors?.typeCompte?.[0],
                        etablissement:
                            response?.data?.errors?.etablissement?.[0],
                        service: response?.data?.errors?.service?.[0],
                    });
                });
        };
        demandeCompte();
    };

    return (
        <div>
            <h2>Demande Compte</h2>
            {message && (
                <p
                    className={
                        message?.type === "success" ? "success" : "warning"
                    }
                >
                    {message?.content}
                </p>
            )}
            <form onSubmit={handleDemande}>
                <div className="form-input">
                    <input type="text" ref={nomRef} placeholder="Nom" />
                    <p style={{ color: "red" }}>
                        {errors?.nom && `* ${errors?.nom}`}
                    </p>
                </div>
                <div className="form-input">
                    <input type="text" ref={prenomRef} placeholder="Prénom" />
                    <p style={{ color: "red" }}>
                        {errors?.prenom && `* ${errors?.prenom}`}
                    </p>
                </div>
                <div className="form-input">
                    <input type="email" ref={emailRef} placeholder="Email" />
                    <p style={{ color: "red" }}>
                        {errors?.email && `* ${errors?.email}`}
                    </p>
                </div>
                <div className="form-input">
                    <input
                        type="text"
                        ref={telephoneRef}
                        placeholder="Téléphone"
                    />
                    <p style={{ color: "red" }}>
                        {errors?.telephone && `* ${errors?.telephone}`}
                    </p>
                </div>
                <div className="form-input">
                    <input type="text" ref={pprRef} placeholder="PPR" />
                    <p style={{ color: "red" }}>
                        {errors?.ppr && `* ${errors?.ppr}`}
                    </p>
                </div>
                <div className="form-input">
                    {/* <input
                        type="text"
                        ref={typeRef}
                        placeholder="Type de compte"
                    /> */}
                    <select ref={typeRef}>
                        <option value="">Type de compte</option>
                        <option value="0">Service</option>
                        <option value="1">Bureau de Formation Continue</option>
                    </select>
                    <p style={{ color: "red" }}>
                        {errors?.typeCompte && `* ${errors?.typeCompte}`}
                    </p>
                </div>
                <div className="form-input">
                    <input
                        type="text"
                        ref={etablissementRef}
                        placeholder="Etablissement"
                    />
                    <p style={{ color: "red" }}>
                        {errors?.etablissement && `* ${errors?.etablissement}`}
                    </p>
                </div>
                <div className="form-input">
                    <input type="text" ref={serviceRef} placeholder="Service" />
                    <p style={{ color: "red" }}>
                        {errors?.service && `* ${errors?.service}`}
                    </p>
                </div>
                <input type="submit" value="Efferctuer la demande" />
            </form>
            <button
                className="demande-compte-button"
                onClick={(event) => {
                    event.preventDefault();
                    let width = -720;

                    let inter = setInterval(() => {
                        if (width < 0) {
                            width += 20;
                            document.querySelector(
                                ".login-page .login"
                            ).style.left = `${width}px`;
                        }
                    }, 0.01);
                    if (width === 0) {
                        clearInterval(inter);
                    }
                }}
            >
                &lt;- Se connecter
            </button>
        </div>
    );
};
export default DemandeForm;

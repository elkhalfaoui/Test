const initialState = {
    token: null,
    user: {},
    name: "zakaria",
};

const Reducer = (state = { ...initialState }, action) => {
    switch (action.type) {

        case "SET_TOKEN":
            return { ...state, token: action.token };

        case "SET_USER":
            return { ...state, user: action.user };    

        default:
            return state;
    }
};

export default Reducer;

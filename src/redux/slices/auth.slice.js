import { createEntityAdapter, createSlice } from "@reduxjs/toolkit";
import { signIn, signUp } from "../actions/auth.action";

const authAdapter = createEntityAdapter();

const getCurrentUser = () => {
  try {
    const usuarioActual = localStorage.getItem("usuarioActual");

    return usuarioActual ? JSON.parse(usuarioActual) : null;
  } catch (error) {
    return null;
  }
};

const initialState = authAdapter.getInitialState({
  status: "idle",
  currentUser: getCurrentUser(),
  error: undefined,
});

const signUpReducer = (builder) => {
  builder
    .addCase(signUp.pending, (state) => {
      state.status = "pending";
      state.error = undefined;
    })
    .addCase(signUp.fulfilled, (state, { payload }) => {
      if (typeof payload === "string") {
        state.status = "failed";
        state.error = payload;
      } else {
        state.status = "fulfilled";
        state.currentUser = payload.user;
      }
    })
    .addCase(signUp.rejected, (state, { payload }) => {
      state.status = "failed";
      state.error = payload;
    });
};

const signInReducer = (builder) => {
  builder
    .addCase(signIn.pending, (state) => {
      state.status = "pending";
      state.error = undefined;
    })
    .addCase(signIn.fulfilled, (state, { payload }) => {
      if (typeof payload === "string") {
        state.status = "failed";
        state.error = payload;
      } else {
        state.status = "fulfilled";
        state.currentUser = payload.user;
      }
    })
    .addCase(signIn.rejected, (state, { payload }) => {
      state.status = "failed";
      state.error = payload;
    });
};

const authSlice = createSlice({
  name: "auth",
  initialState,
  reducers: {
    setUser(state, action) {
      state.currentUser = action.payload;
    },
    setAuthError(state, { payload }) {
      state.error = payload;
    },
  },
  extraReducers: (builder) => {
    signInReducer(builder);
    signUpReducer(builder);
  },
});

export const selectAuthError = (state) => state.auth.error;
export const selectAuthStatus = (state) => state.auth.status;

export const { setUser, setAuthError } = authSlice.actions;

export default authSlice.reducer;

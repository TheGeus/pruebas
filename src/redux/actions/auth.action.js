import { createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";
import { API_URL } from "../../utils/constants";

export const signUp = createAsyncThunk("SIGN_UP", async (body) => {
  try {
    const { data } = await axios.post(`${API_URL}/auth/registrarse`, body);

    return data;
  } catch (err) {
    const error = err;
    if (!error.response) throw err;

    return error.response.data.message;
  }
});

export const signIn = createAsyncThunk("SIGN_IN", async (body) => {
  try {
    const { data } = await axios.post(`${API_URL}/auth/iniciar-sesion`, body);

    return data;
  } catch (err) {
    const error = err;
    if (!error.response) throw err;

    return error.response.data.message;
  }
});

import { createAsyncThunk } from "@reduxjs/toolkit";
import axios from "axios";
import { API_URL } from "../../utils/constants";

export const signUp = createAsyncThunk("SIGN_UP", async (body) => {
  try {
    const { data } = await axios.post(`${API_URL}/auth/registrarse`, body);

    localStorage.setItem(data.token);
    localStorage.setItem(JSON.stringify(data.user));

    return data;
  } catch (err) {
    const error = err;

    if (!error?.response) throw err;

    return error.response.data.message;
  }
});

export const signIn = createAsyncThunk("SIGN_IN", async (body) => {
  try {
    const { data } = await axios.post(`${API_URL}/auth/iniciar-sesion`, body);

    localStorage.setItem(data.token);
    localStorage.setItem(JSON.stringify(data.user));

    const expiresdate = new Date(2068, 1, 20);
    document.cookie = `XSRF-TOKEN=${
      data.token
    };expires= ${expiresdate.toUTCString()}`;

    return data;
  } catch (err) {
    const error = err;
    if (!error.response) throw err;

    return error.response.data.message;
  }
});

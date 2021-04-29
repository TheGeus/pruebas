import "./App.css";
import Navbar from "./components/Navbar/Navbar";
import { Route, BrowserRouter as Router } from "react-router-dom";
import Home from "./pages";
import IniciarSesion from "./pages/auth/iniciar-sesion";
import { Provider } from "react-redux";
import store from "./redux/store";

function App() {
  return (
    <div className="App">
      <Router>
        <Provider store={store}>
          <Navbar />

          <Route path="/" exact component={Home}></Route>
          <Route
            path="/auth/iniciar-sesion"
            exact
            component={IniciarSesion}
          ></Route>
        </Provider>
      </Router>
    </div>
  );
}

export default App;

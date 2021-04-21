
import "./App.css";
import Navbar from "./components/Navbar/Navbar";
import { Route, BrowserRouter as Router } from "react-router-dom";
import Home from "./pages";

function App() {
  return (
    <div className="App">
      <Router>
        <Navbar  />

        <Route path="/" exact component={Home}></Route>
      </Router>
    </div>
  );
}

export default App;

import './App.css';
import 'bootstrap';
import { useState } from 'react';
import axios from 'axios';
// import '../src/insert.php';

function App() {

  const [username, setusername] = useState('');
  const [password, setpassword] = useState('');

  const save = (e) => {
    e.preventDefault();
    console.log(username, password);
    // const url = '/src/insert.php';
    const url = 'http://localhost/abc/insert.php';
    let fData = new FormData();
    fData.append("uname", username);
    fData.append("passwrd", password);

    axios.post(url, fData, {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    })
      .then(response => console.log('Success\n', response.data))
      .catch(error => console.log('Error\n', error));
  }
  return (
    <form id="myForm">
      <div className="mb-3">
        <label htmlFor="exampleInputEmail1" className="form-label">Email address</label>
        <input type="email" className="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onChange={(e => setusername(e.target.value))} />
        <div id="emailHelp" className="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div className="mb-3">
        <label htmlFor="exampleInputPassword1" className="form-label">Password</label>
        <input type="password" className="form-control" id="exampleInputPassword1" name="password" onChange={(e => setpassword(e.target.value))} />
      </div>
      <button type="submit" className="btn btn-primary" name="submit" id="submit" onClick={save}>Submit</button>
    </form>
  );
}

export default App;

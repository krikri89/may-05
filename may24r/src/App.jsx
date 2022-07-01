import { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';

function App() {
  const [count, setCount] = useState(1);
  const [cats, setCats] = useState([]);

  useEffect(() => {
    console.log('go');
  }, []);

  useEffect(() => {
    axios
      .get('http://localhost/vienaragiai/may-05/may24priedas/') // is kur gaunam data
      .then((res) => {
        // ka daryti su data. res=response
        console.log(res.data); // siuo atveju tik atspausdinti data i console.
        setCats(res.data); // spausdins i narsykle
      });
  }, []);

  return (
    <div className="App">
      <header className="App-header">
        <h1>{count}</h1>
        <button onClick={() => setCount((c) => c + 1)}>+1</button>
        {cats.map((cats, index) => (
          <div key={index}>{cats}</div>
        ))}
      </header>
    </div>
  );
}

export default App;

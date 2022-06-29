import { useEffect, useState } from 'react';
import './App.css';

function App() {
  const [select, setSelect] = useState('v');
  const [cb, setCb] = useState({ m: false, b: true, z: false, v: true });

  const checkIt = (p) => {
    // setCb((c) => ({ ...c, [p]: ![p] })); // {padaro objektu} vienas el pakeiciamas kitu. Objecto objectas
    const copyCb = { ...cb };
    copyCb[p] = !copyCb[p];
    copyCb(copyCb);
    setCb((c) => ({ ...c, [p]: ![p] }));
  };

  const doSelect = (e) => {
    // setSelect(e.target.value);
    // console.log(select);

    setSelect((s) => {
      setSelect(e.target.value);
      console.log(select);
    });
  };
  useEffect(() => {
    console.log(select);
  }, [select]);

  return (
    <div className="App">
      <header className="App-header">
        <h1> Do check : </h1>
        <div> Meska</div>{' '}
        <input
          type="checkbox"
          value="m"
          onChange={() => checkIt('m')}
          checked={cb.m}
        />
        <div> </div>{' '}
        <input
          type="checkbox"
          value="b"
          onChange={() => checkIt('b')}
          checked={cb.b}
        />
        <div> Zebras</div>{' '}
        <input
          type="checkbox"
          value="z"
          onChange={() => checkIt('z')}
          checked={cb.z}
        />
        <div> Vilkas, Varna ir Veplys ir dar Vovere</div>
        <input
          type="checkbox"
          value="v"
          onChange={() => checkIt('v')}
          checked={cb.v}
        />
        <h1>Do Select : {select}</h1>
        <select value={select} onChange={doSelect}>
          <option value="m">Meska</option>
          <option value="b">Breidis</option>
          <option value="z">Zebras</option>
          <option value="v">Vilkas, Varna ir Veplys ir dar Vovere</option>
        </select>
      </header>
    </div>
  );
}

export default App;

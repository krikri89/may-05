import { useEffect } from 'react';
import { useState } from 'react';
import axios from 'axios';
import { authConfig } from '../Functions/auth';

function Home() {
  const [list, setList] = useState([]);

  useEffect(() => {
    axios
      .get(
        'http://localhost/vienaragiai/may-05/react-login/back/?url=home',
        authConfig()
      )
      .then((res) => setList(res.data));
  });

  return (
    <>
      <h1>Welcome!</h1>
      {list.map((d, i) => (
        <div key={i}>{d}</div>
      ))}
    </>
  );
}

export default Home;

function Home({ list }) {
  return (
    <>
      <h1>Home Sweet Home</h1>
      <div className="home">
        home
        <div className="home__bin">
          bin
          <div className="home__bin__content">content</div>
        </div>
      </div>

      <ul>
        {list.map((value, i) => (
          <li key={i}>{value}</li>
        ))}
      </ul>
    </>
  );
}

export default Home;

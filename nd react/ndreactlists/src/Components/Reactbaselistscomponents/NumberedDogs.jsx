import dogs from './Reactbaselistscomponents/data/data';
// 3.Atvaizduoti masyvą dogs. Poriniuose indeksuose esančius šunis atvaizduoti kvadratuose, neporinius apskritime.

function Numbered() {
  return (
    <>
      {dogs.map((dog, i) => (
        <div
          key={i}
          className="dogin"
          style={{
            borderRadius: i % 2 ? 50 : 0,
          }}
        >
          {dog}
        </div>
      ))}
    </>
  );
}

export default Numbered;

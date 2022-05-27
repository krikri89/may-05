import dogs from './Reactbaselistscomponents/data/data';

/* // 2.Atvaizduoti masyvą dogs. Kiekvienas šuo atskirame apskritime. Šunys turi būti išrūšiuoti nuo ilgiausio žodžio iki trumpiausio, o apskritimai sunumeruoti nuo 1 iki galo. */

function SortedDogs() {
  dogs.sort((a, b) => b.length - a.length);

  return (
    <>
      {dogs.map((kas, i) => (
        <div key={i} className="dogcircle">
          {i + 1} {kas}
        </div>
      ))}
    </>
  );
}
export default SortedDogs;

import seaPlaners from './Data/Seaplanner';

function Laivas() {
  const car = seaPlaners
    .filter((items) => items.type === 'car')
    .map((items) => (
      <div key={items.id}>
        id:{items.id}, type: {items.type},<span>name: {items.name}</span>
      </div>
    ));
  console.log(typeof car);
  return car;
}

export default Laivas;

//1. Sukurti Komponentą Bala ir jame atvaizduoti masyvą seaPlaners.
import seaPlaners from './Data/Seaplanner';

function Bala() {
  const list = seaPlaners.map((items, i) => (
    <div key={i}>
      {items.id}, {items.type},{' '}
      <span style={{ color: items.color }}>{items.name}</span>
    </div>
  ));
  return list;
}

export default Bala;

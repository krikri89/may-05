import Daiktas from './02Daiktas';

function Tvenkinys({ seaPlaners }) {
  return (
    <>
      {seaPlaners.map((s) =>
        s.id % 2 ? <Daiktas key={s.id} item={s}></Daiktas> : null
      )}
      <hr />
      {seaPlaners.map((s) =>
        s.id % 2 ? null : <Daiktas key={s.id} item={s}></Daiktas>
      )}
    </>
  );
}

export default Tvenkinys;

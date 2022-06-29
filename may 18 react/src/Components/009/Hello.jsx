function Hello({ spalva, size, skaicius }) {
  return (
    <h1
      style={{
        color: spalva,
        fontsize: size + 'px',
      }}
    >
      Hello {skaicius + '12'}
    </h1>
  );
}
export default Hello;

export default ({ color = "rgba(24,161,212,.57)", ySkew = 0, xSkew = -20,width="15vw",height="100vh",margin="0 0 0 10vw",style={} }) => (
  <div
    style={{
      backgroundColor:color,
      transform: `skew(${xSkew}deg, ${ySkew}deg)`,
      width,
      height,
      margin,
      ...style
    }}
  ></div>
);

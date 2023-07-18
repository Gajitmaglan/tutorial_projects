import ListGroup from "./components/ListGroup";
import Alert from "./components/alert";

function App() {
  let cities = [
    "Appingedam",
    "Delfzijl",
    "Groningen",
    "Hoogezand-Sappemeer",
    "Stadskanaal",
    "Veendam",
    "Winschoten",
  ];

  const handleSelectItem = (city: string) => {
    console.log(city);
  };

  return (
    <div>
      <ListGroup
        cities={cities}
        heading="list of cities"
        onSelectItem={handleSelectItem}
      />
      <div> simple HTML</div>
      <Alert>
        <ul>
          <li>complex</li>
          <li>structure</li>
        </ul>
      </Alert>
    </div>
  );
}

export default App;

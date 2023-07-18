import { MouseEvent, useState } from "react";

interface Props {
  cities: string[];
  heading: string;
  onSelectItem: (item: string) => void;
}

function ListGroup({ cities, heading, onSelectItem }: Props) {
  const [selectedIndex, setSelectedIndex] = useState(-1);

  const [name, setName] = useState("no-name");
  return (
    <>
      <h1>{heading}</h1>
      <ul className="list-group">
        {cities.map((city, index) => (
          <li
            className={
              selectedIndex === index
                ? "list-group-item active"
                : "list-group-item"
            }
            key={city}
            onClick={() => {
              setSelectedIndex(index);
              onSelectItem(city);
            }}
          >
            {city}
          </li>
        ))}
      </ul>
      <h3 onClick={() => setName("Kirito")}>Hey, {name}</h3>
    </>
  );
}

export default ListGroup;

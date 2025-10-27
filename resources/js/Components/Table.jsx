// components/Table.jsx
export default function Table({ headers, children }) {
  return (
    <table className="table table-bordered">
      <thead className="bg-gray-200">
        <tr>
          {headers.map((h, i) => (
            <th key={i} className="">{h}</th>
          ))}
        </tr>
      </thead>
      <tbody>{children}</tbody>
    </table>
  );
}

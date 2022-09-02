import { format } from "date-fns";
import { es } from "date-fns/locale";

const formatDateFromDataBase = (dateYmd) => {
  if (dateYmd.includes("-")) {
    const date = dateYmd.split("-");
    return new Date(date[0], date[1] - 1, date[2], 0, 0, 0).toString();
  }
  const date = dateYmd.split("/");
  return new Date(date[0], date[1] - 1, date[2], 0, 0, 0).toLocaleDateString();
};

const formatStringDateToDatabase = (date) => format(date, "yyyy-MM-dd");

const formatCiFromDataBase = (c_i) => Intl.NumberFormat().format(c_i);

const formatCiToDataBase = (c_i) => c_i.split(".").concat();

const formatGenderFromDataBase = (gender) => (gender === "Male" ? "Masculino" : "Femenino");

const formatGenderToDataBase = (gender) => (gender === "Masculino" ? "Male" : "Female");
const formatCrtUpdtAt = (dateString)=>(!dateString ? "00:00:am 00/00/0000" : format(new Date(dateString),"hh:mm:aa dd MMMM yyyy",{locale:es}));
export {
  formatDateFromDataBase,
  formatStringDateToDatabase,
  formatCiFromDataBase,
  formatCiToDataBase,
  formatGenderFromDataBase,
  formatGenderToDataBase,
  formatCrtUpdtAt
};

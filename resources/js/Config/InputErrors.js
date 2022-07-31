//aproved
import { format, isValid } from "date-fns";
const email = (val) =>
  val ? (/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(val) ? null : "fieldError.email") : null;
const equalTo = (fieldToValue) => (fieldFromValue, values) =>
  fieldFromValue === values[fieldToValue] ? null : "fieldError.equalTo";
const validUrl = (val) => {
  if (val) {
    return val.match(/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_+.~#?&//=]*)/)
      ? null
      : "This is not a valid url";
  }
  return null;
};
const validDate = (value) => (value && !isValid(value) ? "Fecha Invalida" : null);
const dateGreaterOrEqual = (min) => (value) => {
  if (isValid(min) && isValid(value)) {
    const valueFormated = new Date(value);
    valueFormated.setHours(0);
    valueFormated.setMinutes(0);
    valueFormated.setSeconds(0);
    valueFormated.setMilliseconds(0);
    const minFormated = new Date(min);
    minFormated.setHours(0);
    minFormated.setMinutes(0);
    minFormated.setSeconds(0);
    minFormated.setMilliseconds(0);
    return valueFormated >= minFormated ? null : "la fecha debe ser mayor a: " + format(minFormated, "dd/MM/yyyy");
  }
  return null;
};
const dateLessOrEqual = (max) => (value) => {
  if (isValid(max) && isValid(value)) {
    const valueFormated = new Date(value);
    valueFormated.setHours(0);
    valueFormated.setMinutes(0);
    valueFormated.setSeconds(0);
    valueFormated.setMilliseconds(0);
    const maxFormated = new Date(max);
    maxFormated.setHours(0);
    maxFormated.setMinutes(0);
    maxFormated.setSeconds(0);
    maxFormated.setMilliseconds(0);
    return valueFormated <= maxFormated ? null : "la fecha debe ser menor a: " + format(maxFormated, "dd/MM/yyyy");
  }
  return null;
};

//it is not  verify
const greaterThan = (fieldToValue) => (fieldFromValue, values) =>
  !_.get(values, fieldToValue) || !fieldFromValue || Number(fieldFromValue) > _.get(values, fieldToValue)
    ? null
    : "fieldError.greaterThan";
const greaterOrEqualThan = (fieldToValue) => (fieldFromValue, values) =>
  !_.get(values, fieldToValue) || !fieldFromValue || fieldFromValue >= _.get(values, fieldToValue)
    ? null
    : "fieldError.greaterOrEqualThan";

const lessOrEqualThan = (fieldToValue) => (fieldFromValue, values) =>
  !_.get(values, fieldToValue) || !fieldFromValue || fieldFromValue <= _.get(values, fieldToValue)
    ? null
    : "fieldError.lessOrEqualThan";
const greaterThanZeroDependency = (dependency) => (valueField, values) =>
  !_.get(values, dependency) || !valueField || valueField > 0 ? null : "fieldError.greaterThanZero";
const greaterThanZeroDependencyNoEmpty = (dependency) => (valueField, values) =>
  (!valueField && _.get(values, dependency)) || (valueField <= 0 && _.get(values, dependency))
    ? "fieldError.greaterThanZero"
    : null;
const greaterThanValue = (min) => (fieldFromValue) =>
  Number(fieldFromValue) > Number(min) ? null : "fieldError.greaterThanValue";
const greaterOrEqualValue = (min) => (fieldFromValue) =>
  Number(fieldFromValue) >= Number(min) ? null : "fieldError.greaterOrEqualThanValue";
const greaterOrEqualThanValue = (min) => (fieldFromValue) =>
  Number(fieldFromValue) >= Number(min) ? null : "fieldError.greaterOrEqualThanValue2";

const lessThanValue = (min) => (fieldFromValue) =>
  Number(fieldFromValue) < Number(min) ? null : "fieldError.lessThanValue";
const lessOrEqualValue = (min) => (fieldFromValue) =>
  Number(fieldFromValue) <= Number(min) ? null : "fieldError.lessOrEqualThanValue";
const lessOrEqualThanValue = (min) => (fieldFromValue) =>
  Number(fieldFromValue) <= Number(min) ? null : "fieldError.lessOrEqualThanValue2";
const betweenValue = (min, max) => (fieldFromValue) =>
  Number(fieldFromValue) <= Number(max) && Number(fieldFromValue) >= Number(min) ? null : "fieldError.betweenValue";

const minLength = (val, length) => (val && val.length >= length ? null : `${length} or more characters is required`);

const required = (val) => {
  if (_.isBoolean(val)) {
    return val ? null : "fieldError.required";
  }
  if (_.isNumber(val)) {
    return val || val === 0 ? null : "fieldError.required";
  }
  return val && val.toString().length ? null : "fieldError.required";
};

const passwordZulipValidation = (val) =>
  val.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{10,14}$/) ? null : "fieldError.strongZulipPassword";

const passwordWeakValidation = (val) => (val.match(/^[.!@#$%^&*0-9a-zA-Z]{7,14}$/) ? null : "fieldError.weakPassword");

const validZip = (val) => (val && /^\d{4,5}(?:-\d{4})?$/.test(val) ? null : "This is not a valid zip");

const composeValidators = (...validators) => (value, values) =>
  validators.reduce((resultError, validator) => resultError || validator(value, values), undefined);

export {
  required,
  validDate,
  dateGreaterOrEqual,
  dateLessOrEqual,
  email,
  equalTo,
  minLength,
  greaterThan,
  greaterThanValue,
  lessThanValue,
  passwordZulipValidation,
  passwordWeakValidation,
  validUrl,
  validZip,
  greaterOrEqualValue,
  lessOrEqualValue,
  lessOrEqualThanValue,
  betweenValue,
  lessOrEqualThan,
  composeValidators,
  greaterOrEqualThan,
  greaterOrEqualThanValue,
  greaterThanZeroDependency,
  greaterThanZeroDependencyNoEmpty,
};

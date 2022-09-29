import { removeLoader, showLoader } from "@/Config/Loader";
import { Inertia } from "@inertiajs/inertia";
import toast from "react-hot-toast";

const defaultMethods = (options) => ({
  onError: (errors) => {
    if (options.onError) options.onError(errors);
    else {
      for (const key in errors) {
        if (Object.hasOwnProperty.call(errors, key)) {
          toast.error(errors[key]);
        }
      }
    }
  },
  onFinish: (params) => {
    if (options.onFinish) options.onFinish(params);
    removeLoader();
  },
  onStart: (visit) => {
    if (options.onStart) options.onStart(visit);
    if(options && !options.noLoader )showLoader();
  },
});

const post = (route, values, options = {}) =>
  Inertia.post(route, values, {
    ...options,
    ...defaultMethods(options),
    onSuccess: (visit) => {
      if (options.onSuccess)  options.onSuccess(visit);
      toast.success("Recurso Guardado con Exito!");
    },
  });
const put = (route, values, options = {}) =>
  Inertia.put(route, values, {
    ...options,
    ...defaultMethods(options),
    onSuccess: (visit) => {
      if (options.onSuccess)  options.onSuccess(visit);
      toast.success("Recurso Actualizado con Exito!");
    },
  });

const get = (route, values, options = {}) =>
  Inertia.get(route, values, {
    ...options,
    ...defaultMethods(options),
  });
const destroy = (route, options = {}) =>
  Inertia.delete(route, {
    ...options,
    ...defaultMethods(options),
    onSuccess: (visit) => {
      if (options.onSuccess) options.onSuccess(visit);
      toast.success("Recurso Eliminado con Exito!");
    },
  });

const visit = (
  route,
  options = {
    data: {},
    replace: false,
    preserveState: false,
    preserveScroll: false,
    only: [],
    headers: {},
    errorBag: null,
    forceFormData: false,
    onCancelToken: (cancelToken) => {},
    onCancel: () => {},
    onBefore: (visit) => {},
    onStart: (visit) => {},
    onProgress: (progress) => {},
    onSuccess: (page) => {},
    onError: (errors) => {},
    onFinish: (visit) => {},
  }
) =>
  Inertia.visit(route, {
    method: "get",
    ...options,
    ...defaultMethods(options),
    onBefore: (visit) => {},
  });

export { post, get, put, visit, destroy };

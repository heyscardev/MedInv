import { removeLoader,showLoader } from "@/Config/Loader";
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
    showLoader();
  },
});

const post = (route, values, options = { onStart, onError, onSuccess, onProgress }) =>
  Inertia.post(route, values, {
    ...options,
    ...defaultMethods(options),
  });

const get = (route, values, options = {}) =>
  Inertia.get(route, values, {
    ...options,
    ...defaultMethods(options)
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
    onBefore:(visit)=>{console.log(visit)}
  });

  
export { post,get, visit };

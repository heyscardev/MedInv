import Modal from "@/Components/Common/Modal";

export default (props) => {
    const { open, onClose } = props;
    return <Modal {...{ open, onClose }}></Modal>;
};

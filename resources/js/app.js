import "./bootstrap";
import { library, dom } from "@fortawesome/fontawesome-svg-core";
import { faAddressCard, faClock } from "@fortawesome/free-regular-svg-icons";
import {
    faSearch,
    faStoreAlt,
    faShoppingBag,
    faSignOutAlt,
    faYenSign,
    faCamera,
} from "@fortawesome/free-solid-svg-icons";

library.add(
    faSearch,
    faAddressCard,
    faStoreAlt,
    faShoppingBag,
    faSignOutAlt,
    faYenSign,
    faClock,
    faCamera
);

dom.watch();

// 画像が変更された時に、定義した関数が実行される
document
    .querySelector(".image-picker input")
    .addEventListener("change", (e) => {
        const inputTag = e.target;
        const reader = new FileReader();
        reader.onload = (e) => {
            inputTag.closest(".image-picker").querySelector("img").src =
                e.target.result;
        };
        reader.readAsDataURL(inputTag.files[0]);
    });

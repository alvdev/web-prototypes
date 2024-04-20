import Alpine from "alpinejs";
import morph from "@alpinejs/morph";
import ajax from "@imacrayon/alpine-ajax";
import collapse from "@alpinejs/collapse";

window.Alpine = Alpine;

Alpine.plugin(morph);
Alpine.plugin(collapse);
Alpine.plugin(ajax);

Alpine.start();

// npm run test tests/Players.test.js
import { vi, describe, test, expect } from "vitest";
import { mount } from "@vue/test-utils";
import Players from "@/Pages/Player/Players.vue";
import axios from "axios";

vi.mock("axios");

describe("Players.vue", () => {
    test("fetches and displays players", async () => {
        axios.get.mockResolvedValue({
            data: [{ id: 1, name: "Leo Messi", age: 36 }],
        });

        const wrapper = mount(Players);

        await new Promise((resolve) => setTimeout(resolve, 1000));

        expect(wrapper.text()).toContain("Leo Messi");
    });
});

// import { mount } from "@vue/test-utils";

// // The component to test
// const MessageComponent = {
//     template: "<p>{{ msg }}</p>",
//     props: ["msg"],
// };

// test("displays message", () => {
//     const wrapper = mount(MessageComponent, {
//         props: {
//             msg: "Hello world",
//         },
//     });

//     // Assert the rendered text of the component
//     expect(wrapper.text()).toContain("Hello world");
// });

// import { test, expect } from "vitest";

// function sum(a, b) {
//     return a + b;
// }

// test("add 2 numbers", () => {
//     expect(sum(2, 3)).toEqual(5);
// });

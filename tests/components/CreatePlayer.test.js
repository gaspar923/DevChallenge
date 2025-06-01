import { mount } from "@vue/test-utils";
import CreatePlayer from "@/Pages/CreatePlayer.vue";
import axios from "axios";
import { vi } from "vitest";

vi.mock("axios");

describe("CreatePlayer.vue", () => {
    it("submits the form and creates a player", async () => {
        axios.post.mockResolvedValue({ data: { name: "Cristiano Ronaldo" } });

        const wrapper = mount(CreatePlayer);

        await wrapper
            .find('input[placeholder="Name"]')
            .setValue("Cristiano Ronaldo");
        await wrapper.find('input[placeholder="Age"]').setValue("39");
        await wrapper.find('input[placeholder="Team ID"]').setValue("2");
        await wrapper.find("button").trigger("click");

        expect(axios.post).toHaveBeenCalledWith("/api/players", {
            name: "Cristiano Ronaldo",
            age: "39",
            team_id: "2",
        });
    });
});

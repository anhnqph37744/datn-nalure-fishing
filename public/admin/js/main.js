document
    .getElementById("fileInput")
    .addEventListener("change", function (event) {
        let files = event.target.files;
        let previewContainer = document.querySelector(".image-preview");
        previewContainer.innerHTML = "";

        Array.from(files).forEach((file, index) => {
            if (!file.type.startsWith("image/")) return;

            let reader = new FileReader();
            reader.onload = function (e) {
                let imageContainer = document.createElement("div");
                imageContainer.classList.add("image-container");

                let img = document.createElement("img");
                img.src = e.target.result;

                let removeBtn = document.createElement("button");
                removeBtn.classList.add("remove-btn");
                removeBtn.innerHTML = "&#10006;";
                removeBtn.addEventListener("click", function () {
                    imageContainer.remove();
                });

                imageContainer.appendChild(img);
                imageContainer.appendChild(removeBtn);
                previewContainer.appendChild(imageContainer);
            };
            reader.readAsDataURL(file);
        });
    });

//tags
const input = document.getElementById("tag-input");
const container = document.getElementById("tags-container");
const hiddenInput = document.getElementById("tags-hidden");
let tags = [];

input.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        let tagText = input.value.trim();
        if (tagText !== "" && !tags.includes(tagText)) {
            tags.push(tagText);

            let tag = document.createElement("span");
            tag.textContent = tagText;

            let removeBtn = document.createElement("button");
            removeBtn.textContent = "×";

            removeBtn.onclick = function () {
                container.removeChild(tag);
                tags = tags.filter((t) => t !== tagText);
                updateHiddenInput();
            };

            tag.appendChild(removeBtn);
            container.insertBefore(tag, input);
            input.value = "";

            updateHiddenInput();
        }
    }
});

function updateHiddenInput() {
    hiddenInput.value = tags.join(",");
}

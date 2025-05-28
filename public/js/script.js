const suggest = document.querySelector(".suggest");
const inputSearch = document.querySelector(".input-search");

inputSearch.addEventListener("input", function () {
    suggest.textContent = ""; // Xoá gợi ý cũ
    // console.log(this.value);
    suggestSearch(this.value); // Gọi API với từ khoá mới
});

async function suggestSearch(keyword) {
    if (keyword != "") {
        const url = `${root}/api/products/search/${keyword}`;
        const request = await fetch(url);
        const result = await request.json();
        console.log(url);

        result.forEach((element) => {
            const li = document.createElement("li");
            li.classList.add("list-group-item");
            li.textContent = element.name; // Display product name
            suggest.append(li); // Add suggestion to list
        });
        console.log(result); // Debugging log
    }
}

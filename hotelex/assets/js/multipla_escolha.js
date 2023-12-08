// Função para criar a caixa de seleção múltipla
function MultiSelectTag(element, options = { shadow: false, rounded: true }) {
  // Elementos e variáveis
  let select = null;
  let wrapper = null;
  let body = null;
  let inputContainer = null;
  let input = null;
  let inputBody = null;
  let btnContainer = null;
  let btn = null;
  let drawer = null;
  let list = null;
  let selected_values = [];

  // Função para atualizar a lista de opções
  function updateList(filter = null) {
    list.innerHTML = "";
    for (let item of selected_values) {
      const li = document.createElement("li");
      li.innerHTML = item.label;
      li.dataset.value = item.value;
      if (!filter || item.label.toLowerCase().startsWith(filter.toLowerCase())) {
        list.appendChild(li);
      }
    }
  }

  // Função para adicionar um item selecionado à área de seleção
  function addItem(item) {
    const itemContainer = document.createElement("div");
    itemContainer.classList.add("item-container");
    itemContainer.style.color = options.tagColor.textColor || "#2c7a7b";
    itemContainer.style.borderColor = options.tagColor.borderColor || "#81e6d9";
    itemContainer.style.background = options.tagColor.bgColor || "#e6fffa";

    const itemLabel = document.createElement("div");
    itemLabel.classList.add("item-label");
    itemLabel.style.color = options.tagColor.textColor || "#2c7a7b";
    itemLabel.innerHTML = item.label;
    itemLabel.dataset.value = item.value;

    const closeIcon = (new DOMParser).parseFromString(
      `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">
         <line x1="18" y1="6" x2="6" y2="18"></line>
         <line x1="6" y1="6" x2="18" y2="18"></line>
       </svg>`, "image/svg+xml").documentElement;

    closeIcon.addEventListener("click", () => {
      const valueToRemove = item.value;
      selected_values = selected_values.filter((selectedItem) => selectedItem.value !== valueToRemove);
      updateList();
      removeItem(valueToRemove);
    });

    itemContainer.appendChild(itemLabel);
    itemContainer.appendChild(closeIcon);
    inputBody.append(itemContainer);
  }

  // Função para remover um item da área de seleção
  function removeItem(value) {
    for (let child of body.children) {
      if (!child.classList.contains("input-body") && child.firstChild.dataset.value === value) {
        body.removeChild(child);
      }
    }
  }

  // Função para lidar com a seleção de itens da lista
  function handleListSelection() {
    for (let li of list.children) {
      li.addEventListener("click", (event) => {
        const value = event.target.dataset.value;
        const selectedItem = selected_values.find((item) => item.value === value);
        selectedItem.selected = true;
        updateList();
        handleSelection();
        input.focus();
      });
    }
  }

  // Função para verificar se um item já foi selecionado
  function isItemSelected(value) {
    for (let child of body.children) {
      if (!child.classList.contains("input-body") && child.firstChild.dataset.value === value) {
        return true;
      }
    }
    return false;
  }

  // Função para desmarcar um item
  function unselectItem(value) {
    for (let child of body.children) {
      if (child.classList.contains("input-body") || child.firstChild.dataset.value !== value) {
        continue;
      }
      body.removeChild(child);
    }
  }

  // Função para atualizar a lista de opções selecionadas
  function handleSelection() {
    selected_values = [];
    for (let i = 0; i < select.options.length; i++) {
      select.options[i].selected = l[i].selected;
      if (l[i].selected) {
        selected_values.push({ label: l[i].label, value: l[i].value });
      }
    }
    options.onChange && options.onChange(selected_values);
  }

  // Inicialização
  select = document.getElementById(element);

  function initialize() {
    l = [...select.options].map((option) => ({
      value: option.value,
      label: option.label,
      selected: option.selected,
    }));
    select.classList.add("hidden");

    wrapper = document.createElement("div");
    wrapper.classList.add("mult-select-tag");

    body = document.createElement("div");
    body.classList.add("wrapper", "body");
    options.shadow && body.classList.add("shadow");
    options.rounded && body.classList.add("rounded");

    inputContainer = document.createElement("div");
    inputContainer.classList.add("input-container");

    input = document.createElement("input");
    input.classList.add("input");
    input.placeholder = options.placeholder || "Search...";

    inputBody = document.createElement("div");
    inputBody.classList.add("input-body");
    inputBody.append(input);

    body.append(inputContainer);
    body.append(inputBody);

    btnContainer = document.createElement("div");
    btnContainer.classList.add("btn-container");

    btn = document.createElement("button");
    btn.type = "button";

    const svg = h.parseFromString(
      `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="18 15 12 21 6 15"></polyline>
       </svg>`, "image/svg+xml").documentElement;
    btn.appendChild(svg);

    body.append(btnContainer);
    body.append(btn);

    drawer = document.createElement("div");
    drawer.classList.add("drawer", "hidden");
    options.shadow && drawer.classList.add("shadow");
    options.rounded && drawer.classList.add("rounded");

    drawer.append(inputContainer);
    list = document.createElement("ul");
    drawer.append(list);

    wrapper.append(body);
    wrapper.append(drawer);

    select.nextSibling ? select.parentNode.insertBefore(wrapper, select.nextSibling) : select.parentNode.appendChild(wrapper);
  }

  // Atualização inicial da lista
  updateList();

  // Adicionar eventos
  btn.addEventListener("click", () => {
    if (drawer.classList.contains("hidden")) {
      updateList();
      handleListSelection();
      drawer.classList.remove("hidden");
      input.focus();
    }
  });

  input.addEventListener("keyup", (event) => {
    updateList(event.target.value);
    handleListSelection();
  });

  input.addEventListener("keydown", (event) => {
    if (event.key === "Backspace" && !event.target.value && inputBody.childElementCount > 1) {
      const lastItem = body.children[inputBody.childElementCount - 2].firstChild;
      l.find((item) => item.value === lastItem.dataset.value).selected = false;
      unselectItem(lastItem.dataset.value);
      handleSelection();
    }
  });

  window.addEventListener("click", (event) => {
    if (!drawer.contains(event.target)) {
      drawer.classList.add("hidden");
    }
  });

  // Expor a função de inicialização
  initialize();
}

// Exemplo de uso
MultiSelectTag('mySelect', {
  shadow: true,
  rounded: false,
  tagColor: {
    textColor: '#ffffff',
    borderColor: '#3498db',
    bgColor: '#3498db',
  },
  placeholder: 'Selecione...',
  onChange: (selectedValues) => {
    console.log('Selecionado:', selectedValues);
  },
});

const menuConfig = {
  title: "Order",
  buttonText: "Send",
  cancellable: true,
};

function createMenu(config) {
  config = Object.assign(
    {
      title: "Foo",
      body: "Bar",
      buttonText: "Baz",
      cancellable: true,
    },
    config
  );
  return config;
}

createMenu(menuConfig);

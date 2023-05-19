
Sk.externalLibraries = {
    'pgzrun': {
        path: ModulesDir+'pgzrun.js',
    },

    'filez': {
        path: ModulesDir+'filez/filez.js', // Write and read files // TODO Convert To UAS CustomData
    },


    'numpy': {
        path: ModulesDir+'numpy/__init__.js',
    },

    'Cookies': {
        path: ModulesDir+'Cookies.js',
    },

    'JsForPy': {
        path: ModulesDir+'JsForPy.js',
    },


    'json': {
        path: ModulesDir+'Json/Json.js',
        dependencies: [
            ModulesDir+'Json/Stringify.js'
        ]
    },

    'pygame': {
        path: ModulesDir+'pygame/pygame.js',
    },
    'pygame.display': {
        path: ModulesDir+'pygame/display.js',
    },
    'pygame.draw': {
        path: ModulesDir+'pygame/draw.js',
    },
    'pygame.event': {
        path: ModulesDir+'pygame/event.js',
    },
    'pygame.font': {
        path: ModulesDir+'pygame/font.js',
    },
    'pygame.image': {
        path: ModulesDir+'pygame/image.js',
    },
    'pygame.key': {
        path: ModulesDir+'pygame/key.js',
    },
    'pygame.mouse': {
        path: ModulesDir+'pygame/mouse.js',
    },
    'pygame.time': {
        path: ModulesDir+'pygame/time.js',
    },
    'pygame.transform': {
        path: ModulesDir+'pygame/transform.js',
    },
    'pygame.version': {
        path: ModulesDir+'pygame/version.js',
    },

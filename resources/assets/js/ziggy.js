    var Ziggy = {
        namedRoutes: {"login":{"uri":"login","methods":["GET","HEAD"],"domain":null},"logout":{"uri":"logout","methods":["POST"],"domain":null},"admin.home":{"uri":"admin\/home","methods":["GET","HEAD"],"domain":null},"admin.manage-accountent":{"uri":"admin\/manage_accountents","methods":["GET","HEAD"],"domain":null},"admin.store-accountent":{"uri":"admin\/accountent","methods":["POST"],"domain":null},"accountent.home":{"uri":"accountent\/home","methods":["GET","HEAD"],"domain":null},"accountent.complete-profile":{"uri":"accountent\/complete_profile","methods":["GET","HEAD"],"domain":null},"accountent.process-acc-complete":{"uri":"accountent\/complete_profile","methods":["POST"],"domain":null},"manager.home":{"uri":"manager\/home","methods":["GET","HEAD"],"domain":null}},
        baseUrl: 'http://localhost/',
        baseProtocol: 'http',
        baseDomain: 'localhost',
        basePort: false,
        defaultParameters: []
    };

    if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
        for (var name in window.Ziggy.namedRoutes) {
            Ziggy.namedRoutes[name] = window.Ziggy.namedRoutes[name];
        }
    }

    export {
        Ziggy
    }

self.addEventListener('message', function(e){
    var data = e.data;
    switch(data.cmd)
    {
        case 'start':
            self.postMessage({'cmd':'continue', 'msg':'continue'});
            break;
        case 'stop':
            self.postMessage({'cmd':'done', 'msg':'yeah'});
            console.log("Terminated");
            self.close();
            break;
    };
}, false);
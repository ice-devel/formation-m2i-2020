function Processor(nameParam, coreParam, speedParam, hasIG) {
    this.name = nameParam;
    this.speed = speedParam;
    this.core = coreParam;
    this.hasIntegratedGraphics = hasIG;

    this.executeBinaryCode = function(binaryCode) {
        console.log("Execution de " + binaryCode + " par le processeur " + this.name);
    }
}
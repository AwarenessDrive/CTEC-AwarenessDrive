Be sure not to remove files in target directory since it will wipe out local (to target)
configuration files. Excluded files are in the file sync.exclude.

Explanation of phing targets (might change so check build.xml):
phing sync - syncs files in workspace to the files on the local server
phing sync:list - just makes a list of files that would be updated

phing sync-sandbox - syncs files in workspace to the sandbox on the production server
phing sync-sandbox:list - lists sync of files in workspace to the sandbox on the production server

phing sync-remote - syncs files in workspace to the remote production server
phing sync-remote:list - lists sync of files in workspace to the remote production server